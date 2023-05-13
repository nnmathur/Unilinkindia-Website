<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <form @submit.prevent>
          <div class="form-group" v-if="addingMode" style="display: none;">
            <label for="description">Reason of Leave</label>
            <input type="text" id="description" class="form-control" v-model="newEvent.description">
          </div>
          <div class="form-group" v-else>
            <label for="description">Reason of Leave</label>
            <input type="text" id="description" class="form-control" v-model="newEvent.description">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group" v-if="addingMode" style="display: none;">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" class="form-control" v-model="newEvent.start_date">
              </div>
              <div class="form-group" v-else>
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" class="form-control" v-model="newEvent.start_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group" v-if="addingMode" style="display: none;">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date">
              </div>
              <div class="form-group" v-else>
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date">
              </div>
            </div>
            <div class="col-md-6 mb-4" v-if="addingMode" style="display: none;">
              <button class="btn btn-sm btn-primary" @click="addNewEvent">Save Event</button>
            </div>
            <template v-else>
              <div class="col-md-6 mb-4">
                <button class="btn btn-sm btn-secondary" @click="addingMode = !addingMode">Close</button>
              </div>
            </template>
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <Fullcalendar @eventClick="showEvent" :plugins="calendarPlugins" :events="events"/>
      </div>
    </div>
  </div>
</template>

<script>
import Fullcalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from "axios";

export default {
  components: {
    Fullcalendar
  },
  data() {
    return {
      calendarPlugins: [dayGridPlugin, interactionPlugin],
      events: "",
      newEvent: {
        event_name: "",
        start_date: "",
        end_date: "",
        color : "",
        leave_type : "",
      },
      addingMode: true,
      indexToUpdate: ""
    };
  },
  created() {
    this.getEvents();
  },
  methods: {
    addNewEvent() {
      axios
        .post("/fullcalendar/api/calendar", {
          ...this.newEvent
        })
        .then(data => {
          this.getEvents(); // update our list of events
          this.resetForm(); // clear newEvent properties (e.g. title, start_date and end_date)
        })
        .catch(err =>
          console.log("Unable to add new event!", err.response.data)
        );
    },
    showEvent(arg) {
      this.addingMode = false;
      const { id, title, start, end, desc, newd, color, leave_type } = this.events.find(
        event => event.id === +arg.event.id
      );
      this.indexToUpdate = id;
      this.newEvent = {
        event_name: title,
        start_date: start,
        end_date: newd,
        description: desc,
        color: color,
        leave_type : leave_type,
      };
    },
    updateEvent() {
      axios
        .put("/fullcalendar/api/calendar/" + this.indexToUpdate, {
          ...this.newEvent
        })
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("Unable to update event!", err.response.data)
        );
    },
    deleteEvent() {
      axios
        .delete("/fullcalendar/api/calendar/" + this.indexToUpdate)
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("Unable to delete event!", err.response.data)
        );
    },
    getEvents() {
      axios
        .get("/fullcalendar/api/calendar")
        .then(resp => (this.events = resp.data.data))
        .catch(err => console.log(err.response.data));
    },
    resetForm() {
      Object.keys(this.newEvent).forEach(key => {
        return (this.newEvent[key] = "");
      });
    }
  },
  watch: {
    indexToUpdate() {
      return this.indexToUpdate;
    }
  }
};
</script>

<style lang="css">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";

.fc-title {
  color: #fff;
}

.fc-title:hover {
  cursor: pointer;
}
</style>

