import axios from 'axios';
import Ordinateur from '../componants/Ordinateur'
import AddOrdinateur from '../componants/AddOrdinateur'

export default {
    components: {
        Ordinateur, AddOrdinateur
    },
    data() {
        return {
            ordinateurs: [],
            date: new Date().toISOString().substr(0, 10),
            menuDate: false,
        }
    },

    computed: {
    },
    created() {
        this.initialize();

    },

    methods: {
        initialize: function () {
            this.ordinateurs = [];
            axios.get('/api/ordinateurs', { params: { date: this.date } })
                .then(({ data }) => {
                    this.ordinateurs = data.data;
                }).catch(error => {
                    console.log(error);
                });
        },
        addOrdinateur: function (ordinateur) {
            this.ordinateurs.push(ordinateur);
        },
    },
}