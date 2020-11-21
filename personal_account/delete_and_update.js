$('.update_info').on( "click", ()=>{ // Появление формы изменения информации о пользователе при нажатии изменить
    $(".block_update_info").css("display", "block");
}
);


$('.close i').on( "click", ()=>{ // Закрытие формы изменения информации о пользователе
    $(".block_update_info").css("display", "none");
} 
);





$('.update_booking').on( "click", ()=>{ // Появление формы изменения информации о бронировании при нажатии изменить
    let id_booking = $(".update_booking").attr("value");
    $(".btn_update_booking ").attr("value", id_booking);
    $(".block_update_booking").css("display", "block");
}
);


$('.close_booking i').on( "click", ()=>{ // Закрытие формы изменения бронирования о пользователе
    $(".block_update_booking").css("display", "none");
} 
);


