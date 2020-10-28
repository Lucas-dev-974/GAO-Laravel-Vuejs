<template>
<v-card>
    <v-card-title>
        {{ ordinateur.name }}
    </v-card-title>
    <v-card-text>
        <v-row v-for="(horaire, key) in horaires" :key="key">
            <v-col cols="2"> {{ horaire.index }}h</v-col>
            <v-col cols="8">
                <span v-if="horaire.attribution">
                    {{ horaire.attribution.name + " " + horaire.attribution.firstname }}
                </span>
            </v-col>
            <v-col cols="2">
                <v-btn v-if="horaire.attribution" icon>
                    <v-icon color="red" small>mdi-minus</v-icon>
                </v-btn>
                <AddAttribution v-if="!horaire.attribution" :ordinateur="ordinateur" @addAttribution='addAttribution' :horaire="horaire.index" :date="date" />
            </v-col>
        </v-row>
    </v-card-text>
</v-card>
</template>

<script src='./ordinateur.js'>
