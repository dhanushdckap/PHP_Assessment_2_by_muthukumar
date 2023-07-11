<html class="h-full bg-gray-100">
<head>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Create table</title>
    <script src = "https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8" >
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Create Table
                </h1>
                <form class="space-y-4 md:space-y-6" action="/create_table" method="post">
                    <div style="display: flex">
                        <label for="text" class="block mb-2 mr-10 text-sm font-medium text-gray-900 dark:text-white">Select Database</label>
                        <select name="database" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <?php foreach ($all_database as $all_databases):?>
                                <option style="text-align: center;padding: 10px"><?php echo $all_databases["Database"]?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div style="display: flex">
                        <label for="text" class="block mb-2 mr-10 text-sm font-medium text-gray-900 dark:text-white">Create Table</label>
                        <input type="text" name="table-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-half p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="table_name" required>
                    </div>
                    <div id="content">

                    </div>
                    <button type="button" id="add" onclick="add_more()" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800" style="text-align: center">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            add column
                        </span>
                    </button>
                    <button type="submit" name="submit" id="create_table_button" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800" style="text-align: center">
                        <span  class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Create Table
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
<script type="text/javascript">
    let create_table_button = document.getElementById("create_table_button");
    let content = document.getElementById("content");
    function add_more(){
        let box_count= 1;
        box_count++;
        $(content).append('<div class="my_box" id="box_loop_'+box_count+'" style="display: flex">' +
                                '<div class="field_box"  style="display: flex;margin-top: 5px">' +
                                    '<input type="textbox" name="column-name[]" id="name" style="width: 11.5rem"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-half p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Column_name" required>' +
                                    '<select name="data-type[]" class="text-white ml-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-0.3 py-1 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">' +
                                        '<option>int</option>' +
                                        '<option>varchar(255)</option>' +
                                        '<option>datetime</option>' +
                                    '</select>' +
                                '</div>' +
                                '<div class="button_box" style="margin-top: 5px">' +
                                    '<input type="button"  value="X"  style="margin-left: 10px" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick=remove_more("'+box_count+'")>' +
                                '</div>' +
                            '</div>');

    }

    function remove_more(box_count){
        $("#box_loop_"+box_count).remove();
    }
</script>
</html>