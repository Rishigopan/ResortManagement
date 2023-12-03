function rotateRollerCarousel(boolL2R) {
    const rollItems = document.querySelectorAll('.rollerItem');
    // let boolL2R = true;
    rollItems.forEach(e => {
        let displayNoneCheck = window.getComputedStyle(e.children[1]).display;
        // e.classList.remove('rollItem1');
        // e.classList.remove('rollItem2');
        // e.classList.remove('rollItem3');
        // e.classList.remove('rollItem4');
        // e.classList.remove('rollItem5');
        if (displayNoneCheck !== 'none') {
            let focusPos = parseInt(e.id.charAt(11));
            let stPos = focusPos - 2 <= 0 ? 5 + (focusPos - 2) : focusPos - 2;
            let nxtStPos;
            if (boolL2R) {
                nxtStPos = stPos + 1;
            } else {
                nxtStPos = stPos - 1;
            }
            var arrIndexes = [];
            for (iR = 1; iR <= 5; iR++) {
                if (nxtStPos > 5) nxtStPos = 1;
                if (nxtStPos < 1) nxtStPos = 5;
                arrIndexes.push([nxtStPos, iR]);
                nxtStPos++;
            }
            arrIndexes.sort((a, b) => a[0] - b[0]);
            arrIndexes.unshift(arrIndexes.pop());
            arrIndexes.forEach(e => {
                let idName = `#rollElement${e[0].toString()}`;
                let clsName = `rollItem${e[1].toString()}`;
                let itemRolling = document.querySelector(idName);
                itemRolling.children[0].classList.remove('fadeRollerAnimation');
                setTimeout(() => {
                    itemRolling.classList.remove('rollItem1');
                    itemRolling.classList.remove('rollItem2');
                    itemRolling.classList.remove('rollItem3');
                    itemRolling.classList.remove('rollItem4');
                    itemRolling.classList.remove('rollItem5');
                    itemRolling.children[0].classList.add('fadeRollerAnimation')
                    itemRolling.classList.add(clsName);
                }, 100);
            })
        }
    })
}

document.querySelectorAll('.nextRollerCarousel').forEach(rollerBtn => {
    rollerBtn.addEventListener('click', function () {
        rotateRollerCarousel(true);
    });
})

document.querySelectorAll('.prevRollerCarousel').forEach(rollerBtn => {
    rollerBtn.addEventListener('click', function () {
        rotateRollerCarousel(false);
    });
})