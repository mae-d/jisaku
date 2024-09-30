function like(commentId) {
  let $this = $('.likes-btn'+commentId);
  console.log($this.text());
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/like/${commentId}`,
      type: "POST",


    })
      .done(function (data, status, xhr) {


        if ($this.text() == "いいね") {
          $this.text("いいねしました");
          $this.css('color','red');
          console.log('いいねしましたに変更');
        } else {
          $this.text("いいね");
          $this.css('color','black');
          console.log('いいねに変更');
        }


      })
      .fail(function (xhr, status, error) {
        console.log('fail')
      })
  }
