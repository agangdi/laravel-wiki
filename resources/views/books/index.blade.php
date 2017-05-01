<?php
/**
 * Created by PhpStorm.
 * User: johnShaw
 * Date: 17/5/1
 * Time: 下午2:08
 */
 ?>
@extends("layouts.admin")

@section('content')

  <div id="admin">
      <v-container fluid="fluid" class="text-xs-center">
          <v-row>
              <v-col xs12="xs12" sm6="sm6"><span>Raised Light Theme</span>
                  <v-card height="300px" class="grey lighten-4 elevation-0">
                      <v-card-text>
                          <div>
                              <v-btn light default>Normal</v-btn>
                          </div>
                          <div>
                              <v-btn light default class="btn--light-flat-focused">Focused</v-btn>
                          </div>
                          <div>
                              <v-btn light default class="btn--light-flat-pressed z-depth-2">Pressed</v-btn>
                          </div>
                          <div>
                              <v-btn light default disabled>Disabled</v-btn>
                          </div>
                      </v-card-text>
                  </v-card>
              </v-col>
              <v-col xs12="xs12" sm6="sm6"><span>Raised Dark Theme</span>
                  <v-card height="300px" class="secondary elevation-0">
                      <v-card-text>
                          <div>
                              <v-btn primary dark>Normal</v-btn>
                          </div>
                          <div>
                              <v-btn primary dark class="btn--dark-flat-focused">Focused</v-btn>
                          </div>
                          <div>
                              <v-btn primary dark class="btn--dark-flat-pressed z-depth-2">Pressed</v-btn>
                          </div>
                          <div>
                              <v-btn primary dark disabled>Disabled</v-btn>
                          </div>
                      </v-card-text>
                  </v-card>
              </v-col>
          </v-row>
      </v-container>
  </div>

@endsection
