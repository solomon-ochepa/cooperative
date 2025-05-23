<!-- Modals -->
@stack('modals')

{{-- Global modals --}}
@auth
    {{--
        @can('accounts.deposit')
            <!-- Deposit Action -->
            <livewire:account::deposit />
        @endcan

        @can('accounts.withdraw')
            <!-- Withdraw Action -->
            <livewire:account::withdraw />
        @endcan
        --}}
@endauth

<!-- Scripts  -->
@stack('js')

<script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('assets/js/plugins/splide/splide.min.js') }}"></script>

<script src="{{ asset('assets/js/base.js') }}"></script>

{{-- <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script> --}}

<!-- Global Livewire -->
<script>
    // Runs after Livewire is loaded but before it's initialized on the page...
    document.addEventListener('livewire:init', () => {
        // Open modals
        Livewire.on('modal.open', (data) => {
            const modal = new bootstrap.Modal(document.getElementById(data.toString()));
            if (modal) {
                modal.show();
            }
        });

        // Close modals
        Livewire.on('modal.close', (data) => {
            const modal = bootstrap.Modal.getInstance(document.getElementById(data.toString()));
            if (modal) {
                modal.hide();
            }
        });

        // Open Offcanvas
        Livewire.on('offcanvas.open', (data) => {
            const offcanvas = new bootstrap.Offcanvas(document.getElementById(data.toString()));
            if (offcanvas) {
                offcanvas.show();
            }
        });

        // Close Offcanvas
        Livewire.on('offcanvas.close', (data) => {
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById(data.toString()));
            if (offcanvas) {
                offcanvas.hide();
            }
        });
    })
</script>
