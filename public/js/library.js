function store(userId, url, token)
{
    var bookName = $('#bookName').val();
    var publishing = $('#publishing').val();

    $.ajax({
        type:'POST',
        url:url,
        data:{_token:token, bookName:bookName, userId:userId, publishing:publishing},
        success:function() {
            alert('新增書籍成功!');
            document.location.href = '/';
        }
    });
}