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
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d287116.1331650988!2d48.89852974388184!3d55.791757673014374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead2b7caccd99%3A0x7fcb77b9b5ad8c65!2z0JrQsNC30LDQvdGMLCDQoNC10YHQvy4g0KLQsNGC0LDRgNGB0YLQsNC9LCDQoNC-0YHRgdC40Y8!5e0!3m2!1sru!2s!4v1647942057773!5m2!1sru!2s" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
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
