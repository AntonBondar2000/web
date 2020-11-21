$(".right button").on("click", ()=>{
    let name = $("#name").val();
    let email = $("#email").val();
    let text = $("#text").val();
    $.ajax({
        type: "POST",
        url: '../feedback.php',
        data: {
            "name": name,
            "email": email,
            "text": text,
        },
        success:()=>{
            
        },
        error:(message)=>{
            alert(message);
        }
    }).done((data)=>{alert(data);});
} )