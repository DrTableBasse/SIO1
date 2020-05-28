const Command = require("../modules/Command.js");
const dl = require('discord-leveling');

class profile extends Command {
  constructor(client) {
    super(client, {
      name = "profile",
      description = "Donne votre level et votre nombre d'xp",
      category = "Level",
      permLevel = "Utilisateur"
    });
  }

  async run(message) {
            var user = message.mentions.users.first() || message.author
 
            var output = await dl.Fetch(user.id)
            message.channel.send(`Salut ${user.tag}! Tu as ${output.level} level(s)! et ${output.xp} xp!`);
  }
}
module.exports = profile