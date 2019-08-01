console.log('this is main js file');

$('.follow').on('click',function(){
    $.ajax({
        method:'POST',
        url: followUrl,
        data: {follow_id:following_id}
    });
});


//{{ $followCheck > 0 ? 'unfollow' : 'follow' }}

//     var followUrl = '{{ route('follow') }}';
//     var unfollowUrl = '{{ route('unfollow') }}';
//     var following_id = '{{ $user[0]->id }}';
//     var following_username = '{{ $user[0]->username }}';
//     var currentUrl = '{{ route('profile') }}'


//     $('.follow').on('click',function(e){
//         e.preventDefault();
//         $.ajax({
//         method:'POST',
//         url: followUrl,
//         data: {follow_id:following_id, _token: '{{csrf_token()}}' },
//         success: function (data) {

//         },
//         error: function (data, textStatus, errorThrown) {
//             console.log(data);
//         }
// });
// });
    
