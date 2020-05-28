const Command = require("../modules/Command.js");
const dl = require('discord-leveling');

class dluser extends Command {
  constructor(client) {
    super(client, {
      name = "deluser",
      description = "Suprimme un utilisateur de la bd.",
      category = "Level",
      permLevel = "Utilisateur"
    });
  }

  async run(message) {
           try { 
            var user = message.mentions.users.first();
            if (!user) return message.reply('Pls, Specify a user I have to delete in my database!');
          
            if (!message.guild.me.hasPermission(`ADMINISTRATION`)) return message.reply('You need to be admin to execute this command!');
          
            var output = await dl.Delete(user.id);
            if (output.deleted == true) return message.reply('Succesfully deleted the user out of the database!');
          
            message.reply('Error: Could not find the user in database.');
           }}
}   
module.exports = dluser