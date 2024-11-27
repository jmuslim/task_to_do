
$(document).ready(function() {
    loadTask();
});

// Create a function to get the task 
function loadTask() {
    $.ajax({
        type: 'GET',
        url: './actions/getAllTask.php',
        dataType: 'json',
        data: {},
        success: function(allTasks){
            // console.log(allTasks);

        allTasks.forEach(task =>{
            // console.log(task.name);
            const hightPrirotyTask = task.priority == "High" ? "table-danger" : "";
            const mediumPrirotyTask = task.priority == "Medium" ? "table-success" : "";
            
            $("#taskTableBody").append(
            `<tr class = "${hightPrirotyTask} ${mediumPrirotyTask}">
                <td> <strong> ${task.name} </strong></td>
                <td>${task.task}</td>
                <td>${task.priority}</td>
                <td>
                <div  class="d-inline-flex gap-1">
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-id="${task.id}">
                    <i class="bi bi-pencil-square"></i></a>
              </button>
                <button type="button" class="btn btn-danger btn-sm deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteTaskModal" data-id="${task.id}">
                    <i class="bi bi-trash-fill"></i>
              </button>
              </div>
              </tr>
                `
            )
        })
        },
        error: function(jqXHR, textStatus, erroThrown){
            console.log(jqXHR, textStatus, erroThrown);
            
        }
    })
}


// Delete Button function 
const deleteConfirmation = 
$("#deleteTask").click(function(){
    alert ('Are you sure you want to delte this?');
});