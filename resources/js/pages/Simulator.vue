<template>
    <v-container>
        <v-card
            class="elevation-4 mt-15 form-details"
        >
            <v-card-title
                class="mb-0 mb-sm-5"
            >
                Le véhicule de vos rêves
            </v-card-title>
            <v-card-text>
                <v-form>
                    <SelectComponent label="Type de véhicule"
                                     :items="vehicleTypes"
                                     :isShown="vehicleTypeSelectIsShown"
                                     selectType="vehicleType"
                                     @inputChange="handleVehicleTypeSelection"
                    />
                    <SelectComponent label="Année de fabrication"
                                     :items="years"
                                     :isShown="yearSelectIsShown"
                                     selectType="year"
                                     @inputChange="handleYearSelection"
                    />

                    <SelectComponent label="Énergie"
                                     :items="energies"
                                     :isShown="energySelectIsShown"
                                     selectType="energy"
                                     @inputChange="handleEnergySelection"
                                     />

                    <SelectComponent label="Kilométrage annuel"
                                     :items="mileages"
                                     :isShown="mileageSelectIsShown"
                                     selectType="mileage"
                                     @inputChange="handleMileageSelection"
                    />

                    <SelectComponent label="Nombre de personnes dans le foyer"
                                     :items="passengers"
                                     :isShown="passengersSelectIsShown"
                                     selectType="passenger"
                                     @inputChange="handlePassengerSelection"
                    />
                </v-form>
            </v-card-text>
            <v-card-actions class="justify-space-around d-flex flex-sm-row flex-column mb-0 mb-sm-3">
                <router-link to="/">
                    <v-btn class="invalidate-button mb-3 mb-sm-0">Étape précédente</v-btn>
                </router-link>
                <router-link to="/result" v-if="validButtonIsShown">
                    <v-btn class="validate-button">Étape suivante</v-btn>
                </router-link>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>

    import SelectComponent from "@/components/SelectComponent.vue";
    export default {
        name: 'SimulatorComponent',
        components: {SelectComponent},
        beforeMount() {
            this.getVehicleTypes();
            this.getYears();
            this.getMileages();
            this.getEnergies();
            this.getPassengers();
        },
        data(){
            return {
                apiURL: import.meta.env.VITE_API_URL,
                passengers: [],
                mileages: [],
                energies: [],
                years: [],
                vehicleTypes: [],

                vehicleTypeSelectIsShown: true,
                yearSelectIsShown: false,
                energySelectIsShown: false,
                mileageSelectIsShown: false,
                passengersSelectIsShown: false,
                validButtonIsShown: false,
            }
        },
        methods: {
            handleVehicleTypeSelection(){
                this.yearSelectIsShown = true;
            },
            handleYearSelection(){
                this.energySelectIsShown = true;
            },
            handleEnergySelection(){
                this.mileageSelectIsShown = true;
            },
            handleMileageSelection(){
                this.passengersSelectIsShown = true;
            },
            handlePassengerSelection(){
                this.validButtonIsShown = true;
            },
            getVehicleTypes() {
                axios.get(`${this.apiURL}/vehicleTypes`)
                    .then(response => {
                        let data = response.data.data;
                        data.map((item) => {
                            this.vehicleTypes.push(item.category);
                        })
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des types de véhicules :', error);
                    });
            },
            getYears() {
                axios.get(`${this.apiURL}/years`)
                    .then(response => {
                        let data = response.data.data;
                        data.map((item) => {
                            this.years.push(item.wording);
                        })
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des années :', error);
                    });
            },
            getEnergies() {
                axios.get(`${this.apiURL}/energies`)
                    .then(response => {
                        let data = response.data.data;
                        data.map((item) => {
                            this.energies.push(item.name);
                        })
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des énergies :', error);
                    });
            },
            getMileages() {
                axios.get(`${this.apiURL}/mileages`)
                    .then(response => {
                        let data = response.data.data;
                        data.map((item) => {
                            this.mileages.push(item.wording);
                        })
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des kilométrages :', error);
                    });
            },
            getPassengers() {
                axios.get(`${this.apiURL}/passengers`)
                    .then(response => {
                        let data = response.data.data;
                        data.map((item) => {
                            this.passengers.push(item.count);
                        })
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des passagers :', error);
                    });
            },
        }
    }
</script>
