// let ancetaBlock = document.getElementById('anceta')
// let tourBlock = document.getElementById('myTour')
// let navMass = document.querySelectorAll('.nav-link')
// ancetaBlock.style.display = 'block'
// tourBlock.style.display = 'none'
// window.location.hash = 'anceta'

// if (window.location.hash) {
//     setTimeout(() => {
//         window.scrollTo(0, 0);
//     }, 1);
// }
// document.addEventListener('click', (e) => {
//     if (e.target.closest('a[href^="#"]')) {
//         e.preventDefault();
//         const hash = e.target.getAttribute('href');
//         history.pushState(null, null, hash); // Меняем URL без скролла
//     }
// });

// function clearActive(mass) {
//     mass.forEach(element => {
//         element.classList.remove('active')
//     });
// }

// console.log(navMass);
// navMass.forEach(btn => {
    
    
//     btn.addEventListener('click', () => {
//         let href = btn.getAttribute('href')
//         clearActive(navMass);
//         switch (href) {
//             case '#anceta':
//                 ancetaBlock.style.display = 'block'
//                 btn.classList.toggle('active')
//                 tourBlock.style.display = 'none'
                
//                 break;
//             case '#myTour':
//                 ancetaBlock.style.display = 'none'
//                 btn.classList.toggle('active')
//                 tourBlock.style.display = 'block'
               
//                 break;
//             default:
//                 ancetaBlock.style.display = 'block'
//                 tourBlock.style.display = 'none'
//                 break;
//         }
//     })
// });


