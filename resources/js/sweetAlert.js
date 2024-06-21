$('.logout').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
        title: 'คุณต้องออกจากระบบหรือไม่!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});
$('.delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
        title: 'คุณต้องลบข้อมูลหรือไม่!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});