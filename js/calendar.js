// Dynamically import tourList with cache-busting
let tourList = [];

// Inject minimal styles for the calendar
(() => {
	const style = document.createElement('style');
	style.textContent = `
		.calendar__list { display: grid; grid-template-columns: repeat(3, minmax(220px, 1fr)); gap: 16px; list-style: none; padding: 0; margin: 0; }
		.calendar__month { border: 1px solid #e0e0e0; border-radius: 12px; padding: 12px; background: #fff; }
		.calendar__month-title { font-weight: 700; font-size: 18px; margin: 0 0 8px 0; text-align: center; }
		.calendar__weekday-row, .calendar__grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; }
		.calendar__weekday { font-size: 12px; color: #666; text-align: center; }
		.calendar__day { height: 32px; border-radius: 8px; background: #f7f7f7; display: flex; align-items: center; justify-content: center; font-size: 13px; position: relative; cursor: default; }
		.calendar__day--empty { background: transparent; }
		.calendar__day--today { outline: 2px solid #121723; outline-offset: -2px; background: #eef6ff; }
		.calendar__day--tour { color: #fff; cursor: pointer; }
		.calendar__dots { position: absolute; bottom: 3px; left: 50%; transform: translateX(-50%); display: flex; gap: 3px; }
		.calendar__dot { width: 5px; height: 5px; border-radius: 50%; border: 1px solid rgba(0,0,0,0.15); }
		.calendar__legend { margin-top: 10px; display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 6px 10px; }
		.calendar__legend-item { display: inline-flex; align-items: center; gap: 8px; font-size: 12px; color: #121723; text-decoration: none; }
		.calendar__legend-item:hover { text-decoration: underline; }
		.calendar__legend-dot { width: 12px; height: 12px; border-radius: 3px; border: 1px solid rgba(0,0,0,0.15); flex: 0 0 12px; }

		/* Responsive */
		@media (max-width: 1024px) {
			.calendar__list { grid-template-columns: repeat(2, minmax(200px, 1fr)); gap: 14px; }
			.calendar__month { padding: 10px; }
			.calendar__month-title { font-size: 17px; }
			.calendar__weekday-row, .calendar__grid { gap: 6px; }
			.calendar__day { height: 30px; font-size: 13px; }
			.calendar__legend { grid-template-columns: 1fr; }
		}

		@media (max-width: 640px) {
			.calendar__list { grid-template-columns: 1fr; gap: 12px; }
			.calendar__month { padding: 10px; border-radius: 10px; }
			.calendar__month-title { font-size: 16px; }
			.calendar__weekday { font-size: 11px; }
			.calendar__weekday-row, .calendar__grid { gap: 4px; }
			.calendar__day { height: 40px; font-size: 14px; }
			.calendar__dots { bottom: 4px; }
			.calendar__legend { grid-template-columns: 1fr; gap: 6px; }
			.calendar__legend-item { font-size: 13px; }
		}
	`;
	document.head.appendChild(style);
})();

const ruMonths = [
	"Январь","Февраль","Март","Апрель","Май","Июнь",
	"Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"
];
const ruWeekdays = ["Пн","Вт","Ср","Чт","Пт","Сб","Вс"];

// Map dates to tours for quick lookup
function buildDateToToursMap() {
	const map = new Map(); // key: YYYY-MM-DD -> array of tours
	tourList.forEach(tour => {
		(tour.date || []).forEach(d => {
			// input like "D.M.YYYY"
			const [dayStr, monthStr, yearStr] = d.split('.');
			const day = String(parseInt(dayStr, 10)).padStart(2, '0');
			const month = String(parseInt(monthStr, 10)).padStart(2, '0');
			const key = `${yearStr}-${month}-${day}`;
			if (!map.has(key)) map.set(key, []);
			map.get(key).push(tour);
		});
	});
	return map;
}

function getMonthMatrix(year, monthIndex) {
	// monthIndex: 0-11
	const firstDay = new Date(year, monthIndex, 1);
	const firstWeekday = (firstDay.getDay() + 6) % 7; // 0=Mon..6=Sun
	const daysInMonth = new Date(year, monthIndex + 1, 0).getDate();
	const cells = [];
	for (let i = 0; i < firstWeekday; i++) cells.push(null);
	for (let d = 1; d <= daysInMonth; d++) cells.push(d);
	while (cells.length % 7 !== 0) cells.push(null);
	return cells;
}

function renderMonth(container, year, monthIndex, dateMap) {
	const monthEl = document.createElement('li');
	monthEl.className = 'calendar__month';
	const title = document.createElement('h3');
	title.className = 'calendar__month-title';
	title.textContent = `${ruMonths[monthIndex]} ${year}`;
	monthEl.appendChild(title);

	const weekdays = document.createElement('div');
	weekdays.className = 'calendar__weekday-row';
	ruWeekdays.forEach(w => {
		const wEl = document.createElement('div');
		wEl.className = 'calendar__weekday';
		wEl.textContent = w;
		weekdays.appendChild(wEl);
	});
	monthEl.appendChild(weekdays);

	const grid = document.createElement('div');
	grid.className = 'calendar__grid';
	const cells = getMonthMatrix(year, monthIndex);
	const today = new Date();
	const todayKey = `${today.getFullYear()}-${String(today.getMonth()+1).padStart(2,'0')}-${String(today.getDate()).padStart(2,'0')}`;

	cells.forEach(day => {
		const cell = document.createElement('div');
		cell.className = 'calendar__day' + (day === null ? ' calendar__day--empty' : '');
		if (day !== null) {
			cell.textContent = String(day);
			const key = `${year}-${String(monthIndex+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
			const tours = dateMap.get(key);
			if (key === todayKey) cell.classList.add('calendar__day--today');
			if (tours && tours.length) {
				cell.classList.add('calendar__day--tour');
				// Color background. If multiple tours, create simple striped gradient of up to 3 colors
				const colors = tours.slice(0,3).map(t => t.color || '#4a90e2');
				if (colors.length === 1) {
					cell.style.background = colors[0];
				} else if (colors.length === 2) {
					cell.style.background = `linear-gradient(135deg, ${colors[0]} 0 50%, ${colors[1]} 50% 100%)`;
				} else {
					cell.style.background = `linear-gradient(135deg, ${colors[0]} 0 33%, ${colors[1]} 33% 66%, ${colors[2]} 66% 100%)`;
				}
				cell.style.color = '#fff';
				cell.title = tours.map(t => t.nameT).join(', ');
				cell.addEventListener('click', () => {
					// Open the first tour link for this day
					const first = tours[0];
					if (first && first.link) window.location.href = first.link;
				});
				// Dots for additional tours
				if (tours.length > 1) {
					const dots = document.createElement('div');
					dots.className = 'calendar__dots';
					tours.slice(0,3).forEach(t => {
						const dot = document.createElement('span');
						dot.className = 'calendar__dot';
						dot.style.background = t.color || '#4a90e2';
						dots.appendChild(dot);
					});
					cell.appendChild(dots);
				}
			}
		}
		grid.appendChild(cell);
	});

	monthEl.appendChild(grid);

	// Legend for visible month
	const legendItems = new Map(); // key: name -> color/link
	const daysInMonth = new Date(year, monthIndex + 1, 0).getDate();
	for (let d = 1; d <= daysInMonth; d++) {
		const key = `${year}-${String(monthIndex+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
		const tours = dateMap.get(key) || [];
		tours.forEach(t => {
			if (!legendItems.has(t.nameT)) legendItems.set(t.nameT, { color: t.color || '#4a90e2', link: t.link || '#' });
		});
	}
	if (legendItems.size) {
		const legend = document.createElement('div');
		legend.className = 'calendar__legend';
		legendItems.forEach((val, name) => {
			const a = document.createElement('a');
			a.className = 'calendar__legend-item';
			a.href = val.link;
			a.title = name;
			const dot = document.createElement('span');
			dot.className = 'calendar__legend-dot';
			dot.style.background = val.color;
			a.appendChild(dot);
			a.appendChild(document.createTextNode(name));
			legend.appendChild(a);
		});
		monthEl.appendChild(legend);
	}
	container.appendChild(monthEl);
}

function renderThreeMonths(startYear, startMonthIndex) {
	const list = document.getElementById('listM');
	if (!list) return;
	list.innerHTML = '';
	const dateMap = buildDateToToursMap();
	let y = startYear;
	let m = startMonthIndex;
	for (let i = 0; i < 3; i++) {
		renderMonth(list, y, m, dateMap);
		m++;
		if (m > 11) { m = 0; y++; }
	}
}

(async function initCalendar() {
	try {
		const mod = await import(`./tourList.js?ver=${Date.now()}`);
		// Ждем загрузки данных из БД
		await mod.tourListPromise;
		tourList = mod.tourList || [];
	} catch (e) {
		console.error('Failed to load tourList', e);
		tourList = [];
	}
	const now = new Date();
	let currentYear = now.getFullYear();
	let currentMonth = now.getMonth(); // 0-11

	const leftBtn = document.getElementById('slideLeft');
	const rightBtn = document.getElementById('slideRight');

	const update = () => renderThreeMonths(currentYear, currentMonth);
	update();

	if (leftBtn) {
		leftBtn.addEventListener('click', () => {
			currentMonth--;
			if (currentMonth < 0) { currentMonth = 11; currentYear--; }
			update();
		});
	}
	if (rightBtn) {
		rightBtn.addEventListener('click', () => {
			currentMonth++;
			if (currentMonth > 11) { currentMonth = 0; currentYear++; }
			update();
		});
	}
})();


