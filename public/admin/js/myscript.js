$(document).ready(function () {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
$("div.alert").delay(2000).slideUp();
function xacNhanXoa(msg) {
    if (window.confirm(msg))
        return true;
    return false;
}
$(document).ready(function () {
    //alert(111);
    $("#addImage").click(function () {
        alert(111);
        //$("#insert").append('<div class="form-group"><input type="file "name="fEditDetail[]"></div>');
    });
});