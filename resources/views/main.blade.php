@extends('layouts.mainlayout')
@section('content')
    <h1>
        Dashbotrd
    </h1>
@endsection
<script>
    function confirmDestroy() {
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لا يمكن التراجع عن عملية الحذف",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم',
            cancelButtonText: 'إلغاء',
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(url, td);
            }
        });
    }
</script>
