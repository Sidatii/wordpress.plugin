<script src="https://cdn.tailwindcss.com"></script>
<?php
/*
Plugin Name: Signal
Plugin URI: https://github.com/Sidatii/wordpress.plugin/blob/main/signal.php
Description: Plugin de signal personnalisé pour WordPress
Version: 1.0
Author: Sidatt
Author URI: https://github.com/Sidatii
*/
// Fonction d'activation du plugin
function my_plugin_activation()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        firstName varchar(255) NOT NULL,
        lastName varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        reportType varchar(255) NOT NULL,
        reportReason varchar(255) NOT NULL,
        comment varchar(255) NOT NULL,
        date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'my_plugin_activation');

// Fonction de désactivation du plugin
function my_plugin_desactivation()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}

register_deactivation_hook(__FILE__, 'mon_plugin_desactivation');
function signal_add_menu_page()
{
    add_menu_page(
        __('Signal', 'textdomain'),
        'Signal',
        'manage_options',
        'Signal',
        '',
        'dashicons-admin-plugins',
        6
    );
    add_submenu_page(
        'Signal',
        __('Books Shortcode Reference', 'textdomain'),
        __('Shortcode Reference', 'textdomain'),
        'manage_options',
        'Signal',
        'Signal_callback'
    );
}

add_action('admin_menu', 'signal_add_menu_page');

function Signal_callback()
{
    ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid">
        <!-- Content goes here -->
        <form class="form m-auto" id="form">
            <div class="relative z-0 w-full mb-6 group">
                <input type="radio" name="firstName" id="firstName"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" "/>
                <label for="firstName"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                    name</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="radio" name="lastName" id="lastName"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label for="floating_password"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                    name</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="radio" name="email" id="email"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label for="floating_repeat_password"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="radio" name="reportType" id="reportType"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label for="reportType"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Report
                    type</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="radio" name="reportReason" id="reportReason"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required/>
                <label for="reportReason"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Report
                    reason</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="radio" name="comment" id="floating_phone"
                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " required/>
                    <label for="comment"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Comment</label>
                </div>
            </div>
            <button type="submit" value="Submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>


    <script>
        const form = document.getElementById('form');
        form.addEventListener('submit', event => {
            let nomInput;
            let prenomInput;
            let emailInput;
            let commentaireInput;
            let raisonInput;
            let typeInput;
            event.preventDefault();
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            if (data.firstName === 'on') {
                nomInput = `<div class="relative z-0 w-full mb-6 group">
            <input type="text" name="firstName" id="firstName"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="firstName"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                name</label>
        </div>`;
            } else {
                nomInput = `<input type="hidden" value=' ' name="firstName" id="nom">`;
            }
            if (data.lastName === 'on') {
                prenomInput = `<div class="relative z-0 w-full mb-6 group">
            <input type="text" name="lastName" id="lastName"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required/>
            <label for="floating_password"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                name</label>
        </div>`;
            } else {
                prenomInput = `<input type="hidden" value=' ' name="lastName" id="prenom">`;
            }
            if (data.email === 'on') {
                emailInput = `<div class="relative z-0 w-full mb-6 group">
            <input type="email" name="email" id="email"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required/>
            <label for="floating_repeat_password"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>`;
            } else {
                emailInput = `<input type="hidden" value=' ' name="email" id="email">`;
            }
            if (data.reportType === 'on') {
                typeInput = `<div>
                                    <label for="reportType">Report type:</label>
                                    <select name="reportType" id="reportType">
                                        <option value="violation and abuse">Violation and abuse</option>
                                        <option value="adult">Adult</option>
                                        <option value="bullying">Bullying</option>
                                    </select>
                                </div>`;
            } else {
                typeInput = `<input type="hidden" value=' ' name="type_signal" id="type_signal">`;
            }
            if (data.reportTypeReason === 'on') {
                raisonInput = `<div>
                                    <label for="raison_signal">raison de signal:</label>
                                    <select name="raison_signal" id="raison_signal">
                                        <option value="raison 1">raison 1</option>
                                        <option value="raison 2">raison 2</option>
                                        <option value="raison 3">raison 3</option>
                                    </select>
                                </div>`;
            } else {
                raisonInput = `<input type="hidden" value=' ' name="raison_signal" id="raison_signal">`;
            }
            if (data.comment === 'on') {
                commentaireInput = `<div>
                                    <label for="commentaire">commentaire:</label>
                                    <textarea style="resize:none" name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                                </div>`;
            } else {
                commentaireInput = `<input type="hidden" value=' ' name="commentaire" id="commentaire">`;
            }
            const formSelected = `<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    ${nomInput}
                                    ${prenomInput}
                                    ${emailInput}
                                    ${typeInput}
                                    ${raisonInput}
                                    ${commentaireInput}
                                    <div>
                                        <input type="hidden" name="action" value="mon_plugin_register">
                                        <input class="Submit" type="submit" value="Envoyer">
                                    </div>
                                </form>`;
            localStorage.setItem("formSelected", formSelected)
            window.open("http://localhost/Plugin/affiche_fome");
        })
    </script>
    <?php
}

function my_plugin_shortcode_signal()
{
    ob_start();
    ?>
    <style>
        p form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 50%;
            margin: 0 25%;
        }

        p form div {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .Submit {
            background-color: #0d6efd;
            color: black;
            font-size: 1rem;
            width: 6rem;
            display: flex;
            justify-content: center;
            border: 1px solid;
            border-radius: 7px;
            cursor: pointer;
        }

        .Submit:hover {
            color: aliceblue;
        }
    </style>
    <p id="p"></p>
    <script>
        var p = document.getElementById('p')
        var formSelected = localStorage.getItem("formSelected")
        p.innerHTML = formSelected
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('my_plugin_form_signal', 'my_plugin_shortcode_signal');
function mon_plugin_register()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $type_signal = $_POST['type_signal'];
    $raison_signal = $_POST['raison_signal'];
    $commentaire = $_POST['commentaire'];

    $wpdb->insert(
        $table_name,
        array(
            'firstName' => $nom,
            'lastName' => $prenom,
            'email' => $email,
            'reportType' => $type_signal,
            'reportReason' => $raison_signal,
            'comment' => $commentaire
        )
    );

    wp_redirect(home_url(''));
    exit;
}

add_action('admin_post_mon_plugin_register', 'mon_plugin_register');
function affiche_signal_add_menu_page()
{
    add_menu_page(
        __('afficheSignal', 'textdomain'),
        'Affichage Signal',
        'manage_options',
        'affiche_Signal',
        '',
        'dashicons-format-gallery',
        6
    );
    add_submenu_page(
        'affiche_Signal',
        __('Books Shortcode Reference', 'textdomain'),
        __('Shortcode Reference', 'textdomain'),
        'manage_options',
        'affiche_Signal',
        'affiche_Signal_callback'
    );
}

add_action('admin_menu', 'affiche_signal_add_menu_page');

function affiche_Signal_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $results = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
    <table>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Report type</td>
            <td>Report reason</td>
            <td>Comment</td>
            <td>Date</td>
        </tr>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td><?= $result->firstName ?></td>
                <td><?= $result->lastName ?></td>
                <td><?= $result->email ?></td>
                <td><?= $result->reportType ?></td>
                <td><?= $result->reportReason ?></td>
                <td><?= $result->comment ?></td>
                <td><?= $result->date ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
}

?>
<script src="https://cdn.tailwindcss.com"></script>
