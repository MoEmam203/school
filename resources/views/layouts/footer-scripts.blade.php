<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">
    var plugin_path = '{{ asset('assets/js') }}/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<script>
    function selectAll(checkboxes,elm){
        let elemnets = document.getElementsByClassName(checkboxes);
        let length = elemnets.length;

        if(elm.checked == true){
            for(let i=0 ; i<length ; i++){
                elemnets[i].checked = true;
            }
        }else{
            for(let i=0 ; i<length ; i++){
                elemnets[i].checked = false;
            }
        }
    }
</script>


<script>
    $('#grade_id').change(function(){
        let grade_id = $(this).val();
        if(grade_id){
            $.ajax({
                type : 'POST',
                url : '{{ URL::to("/student/getClassrooms") }}/'+grade_id,
                data : {
                    '_token' : '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#classroom_id').empty();
                    $('#section_id').empty();
                    $('#classroom_id').append(`<option selected disabled>{{__('Students_trans.Choose')}}...</option>`)
                    $.each(data,function(key,value){
                        $('#classroom_id').append(`<option value="${key}">${value}</option>`)
                    })
                },
                error : function(err){
                    console.log(err)
                }
            })
        }
    })

    $('#classroom_id').change(function(){
        let classroom_id = $(this).val()
        if(classroom_id){
            $.ajax({
                type : "POST",
                url : '{{ URL::to("/student/getSections") }}/'+classroom_id,
                data:{
                    '_token' : '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#section_id').empty();
                    $('#section_id').append(`<option selected disabled>{{__('Students_trans.Choose')}}...</option>`)
                    $.each(data,function(key,value){
                        $('#section_id').append(`<option value="${key}">${value}</option>`)
                    })
                },
                error: function(err){
                    console.log(err)
                }
            })
        }
    })


    $('#grade_id_new').change(function(){
        let grade_id_new = $(this).val();
        if(grade_id_new){
            $.ajax({
                type : 'POST',
                url : '{{ URL::to("/student/getClassrooms") }}/'+grade_id_new,
                data : {
                    '_token' : '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#classroom_id_new').empty();
                    $('#section_id_new').empty();
                    $('#classroom_id_new').append(`<option selected disabled>{{__('Students_trans.Choose')}}...</option>`)
                    $.each(data,function(key,value){
                        $('#classroom_id_new').append(`<option value="${key}">${value}</option>`)
                    })
                },
                error : function(err){
                    console.log(err)
                }
            })
        }
    })

    $('#classroom_id_new').change(function(){
        let classroom_id_new = $(this).val()
        if(classroom_id_new){
            $.ajax({
                type : "POST",
                url : '{{ URL::to("/student/getSections") }}/'+classroom_id_new,
                data:{
                    '_token' : '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#section_id_new').empty();
                    $('#section_id_new').append(`<option selected disabled>{{__('Students_trans.Choose')}}...</option>`)
                    $.each(data,function(key,value){
                        $('#section_id_new').append(`<option value="${key}">${value}</option>`)
                    })
                },
                error: function(err){
                    console.log(err)
                }
            })
        }
    })
</script>