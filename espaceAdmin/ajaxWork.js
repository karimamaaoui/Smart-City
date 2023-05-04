
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



function showHotels(){  
    $.ajax({
        url:"hotels/hotels.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function showPolice(){  
    $.ajax({
        url:"policestation/PoliceStations.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



function showResto(){  
    $.ajax({
        url:"restaurants/Restaurants.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function showPlace(){  
    $.ajax({
        url:"touristplace/Tourists.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}




function showUniversity(){  
    $.ajax({
        url:"university/Universitys.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}