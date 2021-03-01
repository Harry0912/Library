function store(userId, url, token)
{
    var bookName = $('#bookName').val();
    var content = $('#content').val();
    var publishing = $('#publishing').val();

    $.ajax({
        type:'POST',
        url:url,
        data:{_token:token, bookName:bookName, content:content, userId:userId, publishing:publishing},
        success:function() {
            alert('新增書籍成功!');
            document.location.href = '/';
        }
    });
}

function update(bookId, url, token)
{
    var content = $('#content').val();

    $.ajax({
        type:'PATCH',
        url:url,
        data:{_token:token, id:bookId, content:content},
        success:function() {
            alert('編輯書籍成功!');
            document.location.href = '/';
        }
    });
}

function destroy(id, url, token)
{
    console.log(id);
    console.log(url);
    console.log(token);

    $.ajax({
        type:'DELETE',
        url:url,
        data:{_token:token, id:id},
        success:function() {
            alert('刪除書籍成功!');
            document.location.href = '/';
        }
    });
}