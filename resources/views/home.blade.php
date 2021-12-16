@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="container">
                        <h1>Client Details With Ajax Pagination</h1>
                        <div id="tag_container">
                               @include('result')
                        </div>
                    </div>

                    <script type="text/javascript">
                    //check if url containe number, then fetch data from getData function
                        $(window).on('hashchange', function() {
                            if (window.location.hash) {
                                var page = window.location.hash.replace('#', '');
                                if (page == Number.NaN || page <= 0) {
                                    return false;
                                }else{
                                    getData(page);
                                }
                            }
                        });
                        /**
                          * This function is to show the table in View File
                        **/
                        $(document).ready(function()
                        {
                            $(document).on('click', '.pagination a',function(event)
                            {
                                event.preventDefault();

                                $('li').removeClass('active');
                                $(this).parent('li').addClass('active');

                                var myurl = $(this).attr('href');
                                var page=$(this).attr('href').split('page=')[1];

                                getData(page);
                            });

                        });

                        /*
                        * Get all details of clients
                        * @param {int} page - Page number of the table
                        */
                        function getData(page){
                            $.ajax(
                            {
                                url: '?page=' + page,
                                type: "get",
                                datatype: "html"
                            }).done(function(data){
                                $("#tag_container").empty().html(data);
                                location.hash = page;
                            }).fail(function(jqXHR, ajaxOptions, thrownError){
                                  alert('No response from server');
                            });
                        }
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
