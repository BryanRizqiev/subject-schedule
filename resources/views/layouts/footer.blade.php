<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
        href="https://www.wrappixel.com/">wrappixel.com</a>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('js/app-style-switcher.js') }}"></script>
{{-- <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script> --}}
<!--Wave Effects -->
<script src="{{ asset('js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('js/custom.js') }}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
{{-- <script src="{{ asset('plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
</script>
<script src="{{ asset('js/pages/dashboards/dashboard1.js') }}"></script> --}}
@stack('custom-script')
</body>

</html>