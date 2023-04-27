
function showCities(){  
    $.ajax({
        url:"cities/cities.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showHospitals(){  
    $.ajax({
        url:"hospitals/hospitals.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}