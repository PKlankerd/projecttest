let app = new Vue({
    el: '#crudApp',
    data: {
        allData:[],
        filtering: "",

    },
    methods: {
        fetchAllData() {
            axios.post('actionsearch.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        }  
    },
    created() {
        this.fetchAllData();
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            
            const fname = row.Firstname.toLowerCase();
            

            const searchTerm = this.filtering.toLowerCase();

        return (
            
            fname.includes(searchTerm)      
          
               );
            
            });
        },
       
    }
   
})