const Command = require("../modules/Command.js");
const dl = require('discord-leveling');

class givelvl extends Command {
  constructor(client) {
    super(client, {
      name = "givelvl",
      description = "Donne des levels.",
      category = "Level",
      permLevel = "Utilisateur"
    });
  }

  async run(message, client) {
           try { 
            var amount = args[0]
            var user = message.mentions.users.first() || message.author
         
            var output = await dl.SetLevel(user.id, amount)
            message.channel.send(`Hey ${user.tag}! You now have ${amount} levels!`);
           }}
}   
module.exports = givelvl