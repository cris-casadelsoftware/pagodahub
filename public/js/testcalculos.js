
window.onload = function () {
    console.log("function called...");
    ///// Dias /////
    var hoy = new Date();
    var ayer = new Date(hoy.getTime() - (1 * 24 * 60 * 60 * 1000));
    document.getElementById("hoy").value = hoy.toISOString().split("T")[0];
    document.getElementById("ayer").value = ayer.toISOString().split("T")[0];
    /////     /////
}


function sumcash() {
    var cash1 = 0;
    var cash5 = 0;
    var cash10 = 0;
    var cash20 = 0;
    var cash50 = 0;
    var cash100 = 0;
    var totalcash = 0;
    cash1 = document.getElementsByName('cash1');
    cash5 = document.getElementsByName('cash5');
    cash10 = document.getElementsByName('cash10');
    cash20 = document.getElementsByName('cash20');
    cash50 = document.getElementsByName('cash50');
    cash100 = document.getElementsByName('cash100');
    cash1 = parseFloat(cash1[0].value);
    cash5 = parseFloat(cash5[0].value);
    cash10 = parseFloat(cash10[0].value);
    cash20 = parseFloat(cash20[0].value);
    cash50 = parseFloat(cash50[0].value);
    cash100 = parseFloat(cash100[0].value);
    if (isNaN(cash1)) {
        cash1 = 0;
    }
    if (isNaN(cash5)) {
        cash5 = 0;
    }
    if (isNaN(cash10)) {
        cash10 = 0;
    }
    if (isNaN(cash20)) {
        cash20 = 0;
    }
    if (isNaN(cash50)) {
        cash50 = 0;
    }
    if (isNaN(cash100)) {
        cash100 = 0;
    }
    totalcash = cash1 + cash5 + cash10 + cash20 + cash50 + cash100;
    var cashx1 = parseFloat(cash1 * 1);
    var cashx5 = parseFloat(cash5 * 5);
    var cashx10 = parseFloat(cash10 * 10);
    var cashx20 = parseFloat(cash20 * 20);
    var cashx50 = parseFloat(cash50 * 50);
    var cashx100 = parseFloat(cash100 * 100);

    document.getElementById("cashx1").value = cashx1.toFixed(2);
    document.getElementById("cashx5").value = cashx5.toFixed(2);
    document.getElementById("cashx10").value = cashx10.toFixed(2);
    document.getElementById("cashx20").value = cashx20.toFixed(2);
    document.getElementById("cashx50").value = cashx50.toFixed(2);
    document.getElementById("cashx100").value = cashx100.toFixed(2);
    document.getElementById("totalxcash").value = (cashx1 + cashx5 + cashx10 +
        cashx20 + cashx50 + cashx100).toFixed(2);
    document.getElementById("totalcash").value = totalcash.toFixed(2);

}
