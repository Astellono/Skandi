document.querySelector(".header__burger").addEventListener("click", function () {
    document.querySelector(".header__menu").classList.add("header__burger-open");
})

document.querySelector(".header__burger-cross").addEventListener("click", function () {
    document.querySelector(".header__menu").classList.remove("header__burger-open");
})

if (document.location.href.indexOf('showModal') != -1) {
    $("#modal-kirgiziya").modal('show');
}


function sumVector(vec1, vec2) {
    let finalVec = []

    while (vec1.length != vec2.length) {
        let tmp = vec1.length - vec2.length
        if (tmp > 0) {
            vec2.unshift(0)
        } else vec1.unshift(0)
    }
    
    for (let i = 0; i < vec1.length; i++) {
        
        finalVec.push(vec1[i] + vec2[i])
    }

    return finalVec
}

vector1 = [1, 1, 1, 2, 5]
vector2 = [2, 2, 2]
console.log(sumVector(vector1, vector2));