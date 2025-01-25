<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style>
    :root {
        --primary: #1b1d9a;
        --primary-hover: #141e8c;
        --text-light: #fff;
        --text-dark: #212529;
        --background-light: #f8f9fa;
    }

    .btn-primary {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: var(--text-light) !important;
    }

    .btn-primary:hover {
        background-color: var(--primary-hover) !important;
        border-color: var(--primary-hover) !important;
    }

    .btn-primary:active {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
    }

    .btn-outline-primary {
        background-color: transparent !important;
        border-color: var(--primary) !important;
        color: var(--primary) !important;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: var(--text-light) !important;
    }

    .btn-outline-primary:active {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: var(--text-light) !important;
    }

    .bg-primary {
        background-color: var(--primary) !important;
    }

    .text-primary {
        color: var(--primary) !important;
    }

    .text-bg-primary {
        background-color: var(--primary) !important;
        color: var(--text-light) !important;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: var(--background-light) !important;
    }

    .dropdown-menu .dropdown-item:active {
        color: var(--text-dark) !important;
    }

    .nav-item .nav-link {
        font-size: 1rem;
        padding: 0.5rem;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
    }

    .nav-item .nav-link.active {
        background-color: var(--primary) !important;
        color: var(--text-light) !important;
    }

    .nav-item .nav-link:not(.active):hover {
        background-color: var(--background-light) !important;
        color: var(--text-dark) !important;
    }

    .dataTables_paginate .paginate_button {
        margin: 0 !important;
        padding: 0 !important;
    }

    .dataTables_paginate .paginate_button.active a {
        background-color: var(--primary) !important;
        border: none !important;
    }

    .dataTables_paginate .paginate_button:not(.active) a {
        color: #6c757d !important;
    }

    .dataTables_paginate .paginate_button a {
        box-shadow: none;
    }

    .dataTables_paginate .paginate_button.active {
        background-color: var(--primary) !important;
        padding: 0px 3px !important;
        border-radius: 0;
    }

    .dataTables_paginate .paginate_button {
        margin: 0 2px !important;
        border: none !important;
        background: transparent !important;
        color: var(--text-dark) !important;
        transition: all 0.3s ease;
    }

    .dataTables_paginate .paginate_button:hover {
        background: var(--primary) !important;
        color: #fff !important;
        transform: translateY(-2px);
    }

    .dataTables_paginate .paginate_button.current {
        background: var(--primary) !important;
        color: #fff !important;
    }

    .dataTables_paginate .paginate_button.disabled {
        background: transparent !important;
        color: #6c757d !important;
        cursor: not-allowed;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        outline: none;
        background-color: white !important;
        background: white !important;
        box-shadow: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.first:hover,
    .dataTables_wrapper .dataTables_paginate .paginate_button.last:hover {
        outline: none;
        background-color: white !important;
        background: white !important;
        box-shadow: none;
    }
</style>