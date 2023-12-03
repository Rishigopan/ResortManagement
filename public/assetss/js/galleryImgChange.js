var galImgC1R2 = document.querySelector('#galImgC1R2');
var galImgC2R1 = document.querySelector('#galImgC2R1');
var galImgC2R2 = document.querySelector('#galImgC2R2');
var galImgC2R3 = document.querySelector('#galImgC2R3');
var galImgC3R3 = document.querySelector('#galImgC3R3');
var galImgC4R1 = document.querySelector('#galImgC4R1');
var galImgC4R2 = document.querySelector('#galImgC4R2');

function changeImageSet(parentContainer, classShowType, classHideType, activeIndex) {
    let eleCount = parentContainer.childElementCount;
    activeIndex = activeIndex % eleCount;
    console.log(eleCount, activeIndex);
    for (let indx = 0; indx < eleCount; indx++) {
        if (indx == activeIndex) {
            parentContainer.children[indx].classList.remove(classHideType);
            parentContainer.children[indx].classList.add(classShowType);
        } else {
            parentContainer.children[indx].classList.add(classHideType);
            parentContainer.children[indx].classList.remove(classShowType);
        }
    }
}

let indx1 = 0;
let fixedIndexLimit = 500;
setInterval(() => {
    indx1 = ++indx1 % fixedIndexLimit;
    changeImageSet(galImgC1R2, 'galDisplayOpacityShow', 'galDisplayOpacityNone', indx1);
}, 3000);

let indx2 = 0;
setInterval(() => {
    indx2 = ++indx2 % fixedIndexLimit;
    changeImageSet(galImgC2R1, 'galDisplayOpacityShow', 'galDisplayOpacityNone', indx2);
}, 4000);

let indx3 = 0;
setInterval(() => {
    indx3 = ++indx3 % fixedIndexLimit;
    changeImageSet(galImgC2R2, 'galDisplayScaleShow', 'galDisplayScaleNone', indx3);
}, 3500);

let indx4 = 0;
setInterval(() => {
    indx4 = ++indx4 % fixedIndexLimit;
    changeImageSet(galImgC2R3, 'galDisplayRotateXShow', 'galDisplayRotateXNone', indx4);
}, 5000);

let indx5 = 0;
setInterval(() => {
    indx5 = ++indx5 % fixedIndexLimit;
    changeImageSet(galImgC3R3, 'galDisplayOpacityShow', 'galDisplayOpacityNone', indx5);
}, 4500);

let indx6 = 0;
setInterval(() => {
    indx6 = ++indx6 % fixedIndexLimit;
    changeImageSet(galImgC4R1, 'galDisplayRotateYShow', 'galDisplayRotateYNone', indx6);
}, 2500);

let indx7 = 0;
setInterval(() => {
    indx7 = ++indx7 % fixedIndexLimit;
    changeImageSet(galImgC4R2, 'galDisplayScaleShow', 'galDisplayScaleNone', indx7);
}, 5000);