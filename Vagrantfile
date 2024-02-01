# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
	BOX_NAME = "ubuntu/jammy64"
	PROXY_URL  = "http://10.20.5.51:8888"
	#OPPURE "http://10.20.5.51:8888"
	NO_PROXY = "localhost,127.0.0.1"
  PROXY_ENABLE = true
  BASE_INT_NETWORK = "10.10.20"
  BASE_HOST_ONLY_NETWORK = "192.168.56"

  config.vm.define "web" do |subconfig|
    subconfig.vm.box = BOX_NAME
    if(PROXY_ENABLE)
      subconfig.proxy.http = PROXY_URL
      subconfig.proxy.https = PROXY_URL
      subconfig.proxy.no_proxy = NO_PROXY
    end

    #subconfig.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    subconfig.vm.network "private_network", ip: "#{BASE_INT_NETWORK}.10",
      virtualbox__intnet: true
    subconfig.vm.network "private_network", ip: "#{BASE_HOST_ONLY_NETWORK}.10"
    subconfig.vm.synced_folder "./site", "/var/www/html"
    subconfig.vm.provider "virtualbox" do |vb|
      vb.name = "web.m340"
      vb.gui = true
      vb.memory = "1024"
    end 
  subconfig.vm.provision "shell", path: "scripts/provision_apache.sh"
  end

  config.vm.define "db" do |subconfig|
    subconfig.vm.box = BOX_NAME
    if(PROXY_ENABLE)
      subconfig.proxy.http = PROXY_URL
      subconfig.proxy.https = PROXY_URL
      subconfig.proxy.no_proxy = NO_PROXY
    end

    #subconfig.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    subconfig.vm.network "private_network", ip: "#{BASE_INT_NETWORK}.11",
      virtualbox__intnet: true
    subconfig.vm.provider "virtualbox" do |vb|
      vb.name = "db.m340"
      vb.gui = true
      vb.memory = "1024"
    end 
  subconfig.vm.provision "shell", path: "scripts/provision_mysql.sh"
  end
end