        <!-- Footer -->
        <script>
            var base_url = "<?= base_url(); ?>";
        </script>
        <script src="<?= base_url('assets/app-assets/js/script.js'); ?>"></script>

        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
                <span class="navbar-text">
                    &copy; <?= date('Y'); ?>. <a href="https://github.com/RizalFauzi02/SISTAR-PHKA">SISTAR.V.3</a> by <a href="https://github.com/RizalFauzi02/SISTAR-PHKA" target="_blank">UnderSky</a>
                </span>
            </div>
        </div>
        <!-- /footer -->

        </div>
        <!-- /main content -->

        </div>
        <!-- /page content -->

        <!-- SCRIPT TIMER DI HEADER -->
        <script>
            function updateClock() {
                const now = new Date();
                const options = {
                    timeZone: "Asia/Jakarta"
                };

                const hours = now.toLocaleString('id-ID', {
                    ...options,
                    hour: '2-digit',
                    hour12: false
                }).padStart(2, '0');
                const minutes = now.toLocaleString('id-ID', {
                    ...options,
                    minute: '2-digit'
                }).padStart(2, '0');
                const seconds = now.toLocaleString('id-ID', {
                    ...options,
                    second: '2-digit'
                }).padStart(2, '0');

                const formattedTime = `${hours}:${minutes}:${seconds}`;

                const formatterDate = new Intl.DateTimeFormat('id-ID', {
                    ...options,
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });
                const formattedDate = formatterDate.format(now);

                const finalOutput = `${formattedTime} - ${formattedDate}`;

                document.getElementById("realTimeClock").innerText = finalOutput;
            }

            setInterval(updateClock, 1000);
            updateClock();
        </script>
        </body>

        </html>