
    $(document).ready(function() {
    $("#searchSales").click(function() { 
    $.ajax({
        type: "POST", //傳送方式
        url: "store_searchSales.php", //傳送目的地
        dataType: "json", //資料格式
        data: { //傳送資料
            searchStoreSales: $("#searchStoreSales").val() //表單欄位 ID
        },
        
        success: function(res) {
            console.log("store: " + res["storeName"]);
            if (res) { 
                var str = "";
                str =
                '<table class=\"table table-bordered\">'+
                '<thead>'+
                '<tr><th>分店名稱</th>'+
                '<th>店長ID</th>'+
                '<th>總銷量</th>'+
                '</tr></thead><tbody>';
                res.forEach((x) => {
                console.log(x);
                str +=
                '<tr><td>' + x.storeName + '</td>'
                + '<td>' + x.managerID + '</td>'
                + '<td>' + x.sales + '</td></tr>';
            });	
            document.getElementById('datas').innerHTML = str;
            } else { 
                alert('err');
            }
        },
        error: function(res) {
            console.log('err');
        }
        })
    })        
    });