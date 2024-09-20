function like(commentId) {

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/like/${commentId}`,
      type: "POST",
    })
      .done(function (data, status, xhr) {
        console.log(data)
        $('.like').css('color','red');

      })
      .fail(function (xhr, status, error) {
        console.log('fail')
      })
  }

  function unlike(commentId) {
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/unlike/${commentId}`,
      type: "POST",
    })
      .done(function (data, status, xhr) {
        console.log(data)
      })
      .fail(function (xhr, status, error) {
        console.log('fail')
      })
  }