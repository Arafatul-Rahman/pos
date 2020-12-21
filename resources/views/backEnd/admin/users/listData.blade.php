@extends('backEnd.admin.layout.main')
@section('panel-title')
User List
@endsection
@section('content')
<style type="text/css">
    .btn{
        margin: 7px!important;
        border-radius: 3px;
    }
    .swal2-popup{
        width: 46em;
    }
    .swal2-show>.swal2-header>.swal2-title{
        font-size: 17px!important;
    }
    .swal2-html-container{
        font-size: 17px!important;
    }
    .swal2-icon {
        font-size: 15px!important;
    }
    .swal2-cancel{
        font-size: 16px!important;
    }
    .swal2-confirm {
        font-size: 16px!important;
    }

</style>
    <div class="panel-heading">
        <div class="heading-elements">
            <ul class="icons-list">
                <li style="color:#fff"><a href="{{route('admin.users.create')}}" class="btn btn-primary add-new">Add New</a></li>

            </ul>
        </div>
    </div>
    <div class="content">
    	<div class="panel panel-flat">
    		<table class="table table-bordered table-hover datatable-responsive data-list" id="myTable">
    			<thead>
    				<tr>
                        <th>Sl.</th>
    					<th>Name</th>
    					<th>Email</th>
    					<th>Email Verification</th>
    					<th class="text-center">Actions</th>
    				</tr>
    			</thead>
    			<tbody>
    				@if (!empty($userInfos))
                    @foreach ($userInfos as $key => $userInfo)
                    <tr key = {{$key}}>
                        <td>{{++$key}}</td>
                        <td>{{$userInfo->name}}</td>
                        <td>{{$userInfo->email}}</td>
                        <td>
                            @if ($userInfo->emailVerification==1)
                            <span class="label label-success">Verifi</span>
                            @else 
                            <span class="label label-danger">Not Verifi</span>
                            @endif
                        </td>
                        <td class="text-center ">
                            <a href="{{route('admin.users.edit', [$userInfo->id])}}" class="action-icon"><i class="icon-pencil7"></i></a>
                            
                            {{-- <a class="action-icon destroy"><i class="icon-trash" id="delete" >@csrf </i></a> --}}
                            <a class="action-icon destroy" delete-link="{{route('admin.users.destroy', [$userInfo->id])}}">
                                <i class="icon-trash"></i>
                            </a>
                        </td>
                    </tr> 
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No Data Found!</td>
                    </tr>
                @endif
    			</tbody>
    		</table>
    	</div>
    </div>

    <script type="text/javascript">
        $('#myTable').DataTable({
            dom: 'lBfrtip',
                "iDisplayLength": 10,
                "lengthMenu": [ 10, 25,30, 50 ],
        });

    </script>
@endsection
