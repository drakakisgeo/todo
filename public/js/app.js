new Vue({
    el:'#tasksblock',
    data:{
        newTask:''
    },
    ready: function(){
        this.fetchTasks();
        this.$$.taskfield.focus();
    },

    methods:{
        fetchTasks:function(){
            this.$http.get('/taskslist',function(tasks){
                this.$set('tasks',tasks);
            })
        },

        addTask:function(e){
            e.preventDefault();
            this.tasks.push({
                task:this.newTask,
                status:false
            });
        },

        editTask:function(taskitem){
            this.tasks.$remove(taskitem);
            this.newTask = taskitem.task;
            this.$$.taskfield.focus();
        },

        completeTask:function(task){
            alert('completed task '+task);
        },
        removeTask:function(taskitem){
            this.tasks.$remove(taskitem);
        }

    }

})