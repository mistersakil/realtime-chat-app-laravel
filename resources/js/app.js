import.meta.glob(["../images/**"]);
/** HTMX */

/* Import sweetalert2 */
import Swal from "sweetalert2";
window.Swal = Swal;

import "./backend/pace.min";
/* Bootstrap */
import "./backend/bootstrap.bundle.min";

/* Import jQuery */
// import "./backend/jquery.min";
import $ from "jquery";
window.jQuery = window.$ = $;

/** PerfectScrollbar */
import PerfectScrollbar from "perfect-scrollbar";
window.PerfectScrollbar = PerfectScrollbar;

/* Plugins */
import "./backend/simplebar.min";

import metisMenu from "metismenu";
window.metisMenu = metisMenu;

// import "./backend/jquery-jvectormap-2.0.2.min";
// import "./backend/jquery-jvectormap-world-mill-en";
/* Chart */
// import "./backend/chart.min";
// import "./backend/index";
/* App */
import "./backend/app_backend";
