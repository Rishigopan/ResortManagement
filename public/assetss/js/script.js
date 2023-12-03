$("#exploreBtn").click(function () {
    $("#homeSectionCollections").css('display', 'block');
    window.location = ("#homeSectionCollections");

    setTimeout(function () {
        $("#landingSection").css('display', 'none');
        AOS.refresh();
    }, 1000);
})

// document.getElementById('exploreBtn').addEventListener('click', function () {
//     document.getElementById('homeSectionCollections').classList.remove('hideMyEntireSection');
//     setTimeout(function () {
//         document.getElementById('landingSection').classList.add('hideMyEntireSection');
//         AOS.refresh();
//     }, 1000);
// })