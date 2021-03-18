$(document).ready(function() {
    var base_url = window.location.origin; 
    var pathArray = window.location.pathname.split('/');
   // console.log(base_url+"/"+pathArray[1]+"/");  
    document.getElementById("bebas").style.visibility = "hidden";
    var x = document.getElementById("bebas");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    $("#totalItem").change(function() {
        $.ajax({
            type: "POST", 
             url: base_url+"/"+pathArray[1]+"/"+"index.php/DataPenjualan/listHarga",
            data: {
                namaBarang: $("#namaBarang").val(),
                totalItem: $("#totalItem").val()
            },
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8")
                }
            },
            success: function(response) {
                $("#hargaBeli").val(response.harga_beli);
                $("#hargaJual").val(response.harga_jual);
                $("#jmlHargaBeli").val(response.jml_harga_beli);
                $("#jmlHargaJual").val(response.jml_harga_jual);
            },
            error: function(xhr, ajaxOptions, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
            }
        });
    });
    $("#marketplace").change(function() {
        var mar = document.getElementById("marketplace").value;
        var nb = document.getElementById("namaBarang").value;
        var ti = document.getElementById("totalItem").value;
        $("#feeMarket").val("");
        $("#totalPendapatan").val("");
        if (nb == "" || ti == "") {
            $("#marketplace").val("");
            alert("mohon untuk mengisi nama barang dan total item terlebih dahulu!!");
        } else {
            if (mar == "tokopedia") {
                document.getElementById("bebas").style.visibility = "visible";
                document.getElementById("bebas").style.display = "block";
            } else {
                document.getElementById("bebas").style.visibility = "hidden";
                document.getElementById("bebas").style.display = "none";
            }
            if (mar != "tokopedia") {
                $.ajax({
                    type: "POST",
                    url: base_url+"/"+pathArray[1]+"/"+"index.php/DataPenjualan/feeMarket",
                    data: {
                        marketplace: $("#marketplace").val(),
                        jmlHargaJual: $("#jmlHargaJual").val(),
                        jmlHargaBeli: $("#jmlHargaBeli").val()
                    },
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8")
                        }
                    },
                    success: function(response) {
                        $("#feeMarket").val(response.fee);
                        $("#totalPendapatan").val(response.totalPendapatan);
                    },
                    error: function(xhr, ajaxOptions, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                    }
                });
            }
        }

    });
    $("#bebasong").change(function() {
        var mar = document.getElementById("marketplace").value;
        var nb = document.getElementById("namaBarang").value;
        var ti = document.getElementById("totalItem").value;
        $("#feeMarket").val("");
        $("#totalPendapatan").val("");
        $.ajax({
            type: "POST",
            url: base_url+"/"+pathArray[1]+"/"+"index.php/DataPenjualan/feeMarket" ,
            data: {
                marketplace: $("#marketplace").val(),
                jmlHargaJual: $("#jmlHargaJual").val(),
                jmlHargaBeli: $("#jmlHargaBeli").val(),
                bebasongkir: $("#bebasong").val()
            },
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8")
                }
            },
            success: function(response) {
                $("#feeMarket").val(response.fee);
                $("#totalPendapatan").val(response.totalPendapatan);
            },
            error: function(xhr, ajaxOptions, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
            }
        });

    });
});