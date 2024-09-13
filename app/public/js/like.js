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
      })
      .fail(function (xhr, status, error) {
        console.log()
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
        console.log()
      })
  }

  // function like(commentId) {
  //   console.log("動いてる？")
  // }
  
  
