const todos = document.querySelector('.todo-wrapper');
const doings = document.querySelector('.doing-wrapper');
const dones = document.querySelector('.done-wrapper');

const submitTaskBtn = document.querySelector('.submit-task');
const submitMultipTaskBtn = document.getElementById('submit-task-multip');
const updateTaskBtn = document.querySelector('.update-task');
    //   add task 
submitTaskBtn.addEventListener('click',(e)=>{
    e.preventDefault();
    let addTaskForm = document.getElementById('addTaskForm');
    const formData = new FormData(addTaskForm);

    fetch('http://localhost/taskboard/tasks/addTask',{
        method:"post",
        body: formData
    })
    .then((response)=>{
        return response.json();
    })
    .then((data)=>{
        console.log(data);
        if(!data.error){
            getAllTasks();
        }
    })
})

submitMultipTaskBtn.addEventListener('click',(e)=>{
    e.preventDefault();
    console.log('clicked');
    let addMultipTaskForm = document.getElementById('addMultipTaskForm');
    const formData = new FormData(addMultipTaskForm);

    console.log(formData);

    fetch('http://localhost/taskboard/tasks/addMultipTasks',{
        method:"post",
        body: formData
    })
    .then((response)=>{
        return response.json();
    })
    .then((data)=>{
        console.log(data);
        if(!data.error){
            getAllTasks();
        }
    })
})

updateTaskBtn.addEventListener('click',(e)=>{
    e.preventDefault();
    let updateTaskForm = document.getElementById('updateTaskForm');
    const formData = new FormData(updateTaskForm);

    fetch('http://localhost/taskboard/tasks/updateTask',{
        method:"post",
        body: formData
    })
    .then((response)=>{
        return response.json();
    })
    .then((data)=>{
        console.log(data);
        if(!data.error){
            getAllTasks();
        }
    })
})



window.onload = getAllTasks

function getAllTasks(){
    fetch('http://localhost/taskboard/tasks/getTasks')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
    
        appendTasks(data);
    });
}

function appendTasks(tasks){

    
    let tempOutput = ``;

    let todosOutput = ``;
    let doingsOutput = ``;
    let donesOutput = ``;

    let todocount = 0;
    let donecount = 0;
    let doingcount = 0;

    tasks.forEach(task => {
        tempOutput += `
        <div class="card shadow card-search card-body border-primary m-1">
            <div class="d-flex gap-3 align-items-center justify-content-between">
                <div class=" align-self-start" >
                    <p>${task.description}</p>
                </div>
                <div class="">
                    <a class="update-task" data-id="${task.id}" data-description="${task.description}" data-deadline="${task.deadline}" data-status="${task.status}" data-bs-toggle="modal" data-bs-target="#staticBackdropid" ><i class='bx bx-edit my-2' style='color: #0000FF '></i></a>
                    <a class="delete-task"  data-id="${task.id}" ><i class='bx bxs-trash-alt my-2'  style='color:#f30d0d'></i></i></a>
                </div>
            </div>
            <p class="mb-0" style="font-size: 12px;"><i class='bx bx-info-circle' style='color:#182877' ></i><span> Deadline : </span>${task.deadline}</p>
        </div>
        `;

        if(task.status === 'todo'){
            todosOutput += tempOutput;
            todocount++;

        } else if(task.status === 'doing'){
            doingsOutput += tempOutput;
            doingcount++;
        }else if(task.status === 'done'){
            donesOutput += tempOutput;
            donecount++;
        } 
        tempOutput = ``;
    });

    document.getElementById('todo-count').innerHTML = todocount;
    document.getElementById('doing-count').innerHTML = doingcount;
    document.getElementById('done-count').innerHTML = donecount;
    
    todos.innerHTML = todosOutput;
    doings.innerHTML = doingsOutput;
    dones.innerHTML = donesOutput;

    document.querySelectorAll('.delete-task').forEach(btn=>{
        btn.addEventListener('click',()=>{
            deleteTask(btn.dataset.id)
        })
    })

    document.querySelectorAll('.update-task').forEach(btn=>{
        btn.addEventListener('click',()=>{

            const updateForm = document.getElementById('updateTaskForm');
            document.getElementById('description').value = btn.dataset.description;
            document.getElementById('status').value = btn.dataset.status;
            document.getElementById('deadline').value = btn.dataset.deadline.split(' ')[0];
            document.getElementById('id').value = btn.dataset.id;
        })
    })

}

function deleteTask(id){

    const formData = new FormData();
    formData.append('id',id)

    fetch('http://localhost/taskboard/tasks/deleteTask',{
        method:"post",
        body: formData
    })
    .then((response)=>{
        return response.json();
    })
    .then((data)=>{
        console.log(data);
        if(!data.error){
            getAllTasks();   
        }
    })
}


