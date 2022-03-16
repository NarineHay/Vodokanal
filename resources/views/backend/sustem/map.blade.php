@extends('backend.layouts.app')
@section('title' ) 
@section('content')
<style>
/* table {
  width: 50%;
  counter-reset: row-num;
} */
table tr {
  counter-increment: row-num;
}
table tr td:first-child::before {
    content: counter(row-num);
}

</style>
<div class="container-fluid mt-4">
    <div class="animated fadeIn">
        <div class="content-header"></div>
        <!--content-header-->
        <div class="row">
            <div class="col">
                <div class="card" style="padding: 25px;">
                   
                    <h3>Карта терминалов</h3>
                       

                        <table class="table table-bordered">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24379.296176452168!2d44.51974715!3d40.19989689999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1647418226809!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                          </table>
                   </div>


                <!--card-body-->
            </div>
            <!--card-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--animated-->
@endsection
