import axios from 'axios';
import AddAttribution from './AddAttribution.vue'
export default {
    props: {
        ordinateur: {
            required: true
        },
        date: {
            required: true
        },
    },
    watch: {
        ordinateur: function () {
            this.initialise();
        }
    },
    components: {
        AddAttribution
    },
    data() {
        return {
            horaires: [],
            attributions: {}
        }
    },

    computed: {
    },
    created() {

        this.initialise();
    },

    methods: {

        initialise() {

            this.ordinateur.attributions.forEach(attribution => {
                this.attributions[attribution.horaire] = {
                    name: attribution.client.name,
                    firstname: attribution.client.firstname
                };
            });
            this.buildHoraires();
        },
        buildHoraires() {

            this.horaires = [];

            for (let i = 0; i < 10; i++) {
                this.horaires.push({
                    index: i + 8,
                    attribution: (typeof this.attributions[i + 8] !== 'undefined') ? this.attributions[i + 8] : false
                })
            }


        },
        addAttribution: function (attribution) {
            this.ordinateur.attributions.push(attribution)
            this.initialise();
        }
    },
}