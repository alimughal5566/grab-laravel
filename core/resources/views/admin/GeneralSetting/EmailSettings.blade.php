@extends('admin.master')

@section('title', 'Email Settings')

@section('body')

    <h2 class="mb-4">Email Settings</h2>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> CODE </th>
                        <th> DESCRIPTION </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> <pre>&#123;&#123;message&#125;&#125;</pre> </td>
                        <td> Details Text From Script</td>
                    </tr>

                    <tr>
                        <td> 2 </td>
                        <td> <pre>&#123;&#123;name&#125;&#125;</pre> </td>
                        <td> Users Name. Will Pull From Database and Use in EMAIL text</td>
                    </tr>
                    </tbody>
                </table>
            </div> <br>
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('admin.emailSettingsPro')}}" method="post">
                @csrf
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="email_sent_from" style="text-transform: uppercase;"><strong>Email Sent Form</strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="email_sent_from"  value="{{$basicSetting->email_sent_form}}" required>

                    </div>
                </div>

                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="email_template" style="text-transform: uppercase;"><strong>EMAIL TEMPLATE</strong></label>
                        <textarea class="form-control" id="email_template" rows="10" name="email_template" >{{$basicSetting->email_template}}</textarea>
                    </div>
                </div>

                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary btn-block btn-lg customs-btn-bd">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    {{--code for nicedit--}}
    <div id="email_template">
        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>

    </div>

    {{--dropdown active--}}
    <script>
        $('#sm_base li:nth-child(3)').addClass('active');
        $('#sm_base').addClass('show');
    </script>
@endsection
