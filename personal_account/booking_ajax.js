$(".block_update_booking form button").on("click", ()=>{
    let id_booking = $(".update_booking").attr("value");
    let room = $("#choose-room").val();
    let guests = $("#choose-quantity-guests").val();
    $.ajax({
        type: "POST",
        url: '../update_booking.php',
        data: {
            "room": room,
            "guests": guests,
            "id_booking": id_booking,
        },
        success:()=>{
            
        },
        error:(message)=>{
            alert(message);
        }
    }).done((data)=>{
        $(".block_update_booking").css("display", "none");
        
    });
} );


$("#delete_form button").on("click", ()=>{
    let id_booking = $(".btn_delete_booking").attr("value");
    $.ajax({
        type: "POST",
        url: '../delete_booking.php',
        data: {
            "id_booking": id_booking,
        },
        success:()=>{
            
        },
        error:(message)=>{
            alert(message);
        }
    }).done((data)=>{
        alert(data);
        
    });
} )