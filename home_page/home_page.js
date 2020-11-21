$(".booking-hotel-form button").on("click", function(){

    let data_begin = $("#data-of-arrival").val();
    let data_end = $("#date-of-departure").val();
    let room = $("#choose-room").val();
    let guests = $("#choose-quantity-guests").val();
    $.ajax({
        type: "POST",
        url: '../booking.php',
        data: {
            "data_begin": data_begin,
            "data_end": data_end,
            "room": room,
            "guests": guests,
        },
        success:()=>{
            
        },
        error:(message)=>{
            alert(message);
        }
    }).done((data)=>{alert(data);});
    

});