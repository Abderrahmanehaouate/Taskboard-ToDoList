<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="container mt-5">

    <div class="d-md-flex">
        <div class="col-md-3 d-flex  justify-content-center my-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Task
            </button>
        </div>
        <!-- search  -->
        <div class="col-md-6 align-self-center my-3">
            <form class="input-group d-flex justify-content-center  flex-nowrap">
                <div class="form-outline">
                    <input type="search" placeholder="Search" id="searchInput" class="form-control lead " />
                </div>
                <button type="button" class="btn btn-primary">
                <i class='bx bx-search'></i>
                </button>
            </form>
        </div>

        <div class="col-md-3 d-flex justify-content-center my-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMultipTask">
        Add Multip Task
        </button>
        </div>
    </div>
    <!-- add tasks -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add One Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <!-- form -->
                        <form id="addTaskForm">

                            <div class="mb-3">
                                <label class="form-label">Add Task description</label>
                                <input type="text" name="description" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deadline of Task</label>
                                <input type="date" name="deadline" class="form-control" >
                            </div>
                    </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="submit-task btn btn-primary">Submit</button>
                            </div>
                    </form>
            </div>
        </div>
    </div>
                <!-- end add tasks -->
    <!-- add Multip task -->
    <div class="modal fade" id="addMultipTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add One Task Or more </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <!-- form -->
                        <div class="mb-3">
                            <label class="form-label">Nubmer of tasks do you want to add</label>
                            <input type="number"  min="1" id="form-count" value="1" onchange="createForms()" class="form-control">
                        </div>
                        <!-- form -->
                        <form id="addMultipTaskForm">

                            <div id="forms-container">
                                <div class="mb-3">
                                    <label class="form-label">Add Task description 1</label>
                                    <input type="text" name="description[]" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deadline of Task 1</label>
                                    <input type="date" name="deadline[]"  class="form-control" >
                                </div>
                            </div>

                    </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button id="submit-task-multip" class=" btn btn-primary" >Submit</button>
                            </div>

                    </form>
            </div>
        </div>
    </div>


    <script>
        function createForms() {

        let formCount = document.getElementById("form-count");
        if(formCount.value <=0 || isNaN(formCount.value)) {

            formCount.value = 1;
        
        } else if(formCount.value > 6) formCount.value = 6;

        var formsContainer = document.getElementById("forms-container");

        formsContainer.innerHTML = "";
        for(var i = 0; i < formCount.value ; i++) {

            var div = document.createElement("div");
            div.innerHTML = `
                            <div class="mb-3">
                                <label class="form-label">Add Task description ${(i+1)}</label>
                                <input type="text" name="description[]" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deadline of Task ${(i+1)}</label>
                                <input type="date" name="deadline[]" min="<?= date(
                                    'Y-m-d'
                                ) ?>" class="form-control" >
                            </div>`;
            formsContainer.appendChild(div);
    }
}

    </script>
                <!-- end add multip tasks -->
    <!-- update tasks -->


    <div class="modal fade" id="staticBackdropid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add One Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <!-- form -->
                        <form id="updateTaskForm">

                            <div class="mb-3">
                                <label class="form-label">Add Task description</label>
                                <input id="description" type="text" name="description" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deadline of Task</label>
                                <input id="deadline" type="date" name="deadline" min="<?= date(
                                    'Y-m-d'
                                ) ?>"
                                class="form-control" >
                            </div>
                            <div class="mb-3">
                                <select class="form-select" id="status" name="status">
                                    <option value="todo">To do</option>
                                    <option value="doing">Doing</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
                            <input id="id" name="id" hidden value="" />
                    </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="update-task btn btn-primary">Update</button>
                            </div>
                    </form>
            </div>
        </div>
    </div>
                <!-- end update tasks -->

    <div class="d-flex justify-content-center align-items-start flex-wrap gap-3 mt-5 ">
                                            <!-- To do  -->
        <div class="col-md-3 d-flex flex-column justify-content-center flex-nowrap mx-5">

            <div style="width: 18rem;" class="border-5 border-danger border-start bg-light mb-2">
                <h1 class="lead-0 text-muted text-center">To Do <span id = "todo-count"></span></h1>
            </div>

            <div class="todo-wrapper card mt-0 p-2 bg-light" style="width: 18rem;">
            <!-- Todos goes here -->
            </div>

        </div>

        <!-- doing -->
        <div class="col-md-3 d-flex flex-column justify-content-center flex-nowrap mx-5">

            <div style="width: 18rem;" class="border-5 border-warning border-start bg-light mb-2">
                <h1 class="lead-0 text-muted text-center">Doing  <span id = "doing-count"></span></h1>
            </div>

            <div class="doing-wrapper card mt-0 p-2 bg-light" style="width: 18rem;">
                <!-- Doing goes here -->
            </div>
        </div>

        <!-- Done  -->
        <div class="col-md-3 d-flex flex-column justify-content-center flex-nowrap mx-5">
            <div style="width: 18rem;" class=" border-5 border-success border-start bg-light mb-2 ">
                <h1 class="lead-0 text-muted text-center">Done   <span id = "done-count"></span></h1>
            </div>
            <div class="done-wrapper card mt-0 p-2 bg-light" style="width: 18rem;">
        <!-- Done goes here -->
            </div>
        </div>

    </div>
    
</div>

<script>
            const searchInput = document.querySelector('#searchInput');
            const cards = document.querySelectorAll(".card");

            searchInput.addEventListener("input",(e)=>{
                const serachText = e.target.value.toLowerCase();

                cards.forEach((card) => {
                    const cardText = card.textContent.toLowerCase();
                    if(cardText.indexOf(serachText)!==-1){
                        card.style.display ="block";
                    }else {
                        card.style.display = "none";
                    }
                });
            });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>












