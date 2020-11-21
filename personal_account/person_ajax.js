$(".block_update_info button").on("click", ()=>{
    let update_fullname = $("#update_full_name").val();
    let update_email = $("#update_email").val();
    let update_phone = $("#update_phone").val();
    $.ajax({
        type: "POST",
        url: '../update_info_user.php',
        data: {
            "update_fullname": update_fullname,
            "update_email": update_email,
            "update_phone": update_phone,
        },
        success:()=>{
            
        },
        error:(message)=>{
            alert(message);
        }
    }).done((data)=>{
        $(".block_update_info").css("display", "none");
        alert("Чтобы увидеть изменения обновите страницу"); 
        
    });
} )