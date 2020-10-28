<template>
<v-container>
    <v-row>
        <v-col cols="12" sm="8" md="4">
            <v-menu v-model="menuDate" :close-on-content-click="false" :nudge-right="40" transition="scale-transition" offset-y min-width="290px">
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field v-model="date" label="Saisir une date" prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"></v-text-field>
                </template>
                <v-date-picker v-model="date" @change="initialize" @input="menuDate = false" locale="fr-fr"></v-date-picker>
            </v-menu>
        </v-col>
    </v-row>
    <addOrdinateur @add="addOrdinateur" />
    <v-row>
        <v-col cols="12" sm="6" md="4" v-for="(ordinateur, key) in ordinateurs" :key="key">
            <ordinateur :ordinateur="ordinateur" :date="date"> </ordinateur>
        </v-col>
    </v-row>
</v-container>
</template>

<script src='./home.js'>
